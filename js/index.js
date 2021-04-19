$(document).ready(function(){
    $(".add-task").on("click",function(e){
        if(e.target.parentNode.getAttribute("id") === "add"){
            $("#add").on("submit",(function(e){
                e.preventDefault();
                var task = $("#add textarea").val();
                if(task) {
                    $.post("/tasks/addTask",{task},function(data){
                        $(".tasks-list").append(data);
                    })
                }
                $("#add textarea").val("");
                return false;
            }));
        }
        else if(e.target.parentNode.getAttribute("id") === "edit"){
            $("#edit").on("submit",function(e){
                e.preventDefault();
                var task = $("#edit textarea").val();
                var id = $("#edit input").val();
                if(task) {
                    $.post("/tasks/process_edit",$(this).serialize(), function(data){
                         $(".add-task").html(data);
                         $.get(`/tasks/process_task/${id}`, function(task){
                             $(`.tasks-list div[data-id=${id}]`).replaceWith(task);
                        })
                    });
                }
                $("#edit textarea").val("");
                return false;
            });
        }
    });
    
    $("#toggle input").change(function(e){
        var id = ($(this).parent().attr("data-id"))
        $.post("/tasks/is_complete",{id},function(data){
            $(`.tasks-list div[data-id=${id}]`).replaceWith(data);
        });
    });

    $(".tasks-list").on("click", "#delete", function(e){
            e.preventDefault();
            $.get(e.target.parentNode.getAttribute("href"),function(data){
                $(`.tasks-list div[data-id=${data}]`).remove();
            })
    });

    $(".tasks-list").on("click", "#beginEdit", function(e){
            e.preventDefault();
            $.get(e.target.parentNode.getAttribute("href"), function(data){
                $(".add-task").html(data);
            })
    });

    
    
})
let cookies = document.cookie.split(';');
let id = document.cookie ? cookies.length : 0;

if (id > 0) {
    cookies.forEach((element) => {
        id = element.split('=')[0].trim();
        addToDom(element.split('=')[1], id);
    });
}

$('#new').click(e => {
    e.preventDefault();
    const task = prompt("Your new task is:")
    if (task && task.trim()) {
        id++;
        addToDom(task, id);
        document.cookie = id + "=" + task;
    }
})

function addToDom(task, id) {
    let div = $('<div></div>').attr({
        id: id,
        onclick: "delTask(" + id + ")"
    });
    div.text(task);
    $('#ft_list').prepend(div);
}

function delTask(id) {
    if (confirm("Are you sure you want to delete this task?")) {
        $('#' + id).remove();
        document.cookie = id + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    }
}

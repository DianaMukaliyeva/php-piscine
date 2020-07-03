let id = 0;
$.get('select.php', (data, status) => {
    if (status == 'success' && data != 'empty') {
        let response = JSON.parse(data);
        response.forEach(element => {
            id = element['id'];
            addToDom(element['task'], id);
        });
    }
})

$('#new').click(e => {
    e.preventDefault();
    const task = prompt("Your new task is:")
    if (task && task.trim()) {
        id++;
        addToDom(task, id);
        $.post('insert.php', { id, task });
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
        let div = $('#' + id).remove();
        $.post('delete.php', { id });
    }
}

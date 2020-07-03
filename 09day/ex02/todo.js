let cookies = document.cookie.split(';');
let id = document.cookie ? cookies.length : 0;

if (id > 0) {
    cookies.forEach((element) => {
        id = element.split('=')[0].trim();
        addToDom(element.split('=')[1], id);
    });
}

document.getElementById('new').addEventListener('click', e => {
    e.preventDefault();
    const task = prompt("Your new task is:")
    if (task && task.trim()) {
        id++;
        addToDom(task, id);
        document.cookie = id + "=" + task;
    }
})

function addToDom(task, id) {
    const parent = document.getElementById('ft_list');
    let newTask = document.createElement('div');
    newTask.innerHTML = task;
    newTask.setAttribute('id', id);
    newTask.setAttribute('onclick', "delTask(" + id + ")");
    parent.insertBefore(newTask, parent.firstChild);
}

function delTask(id) {
    if (confirm("Are you sure you want to delete this task?")) {
        let parent = document.getElementById("ft_list");
        let task = document.getElementById(id);
        parent.removeChild(task);
        document.cookie = id + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    }
}

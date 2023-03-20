const TodoModal = document.querySelector("#TodoModal");
const openTodoModal = document.querySelector(".fa-plus");
const closeTodoModal = document.getElementById("close");

openTodoModal.addEventListener("click", () => {
    TodoModal.showModal();
});

closeTodoModal.addEventListener("click", () => {
    TodoModal.close();
});

function searchTable() {
    let input, filter, tasks, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    tasks = document.getElementsByClassName("searchable-task");

    for (i = 0; i < tasks.length; i++) {
        txtValue = tasks[i].textContent || tasks[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tasks[i].style.display = "";
        } else {
            tasks[i].style.display = "none";
        }
    }
}

const editModal = document.querySelector("#EditModal");
const openEditModal = document.getElementById("openEdit");
const closeEditModal = document.getElementById("closeEdit");

openEditModal.addEventListener("click", () => {
    editModal.showModal();
});

closeEditModal.addEventListener("click", () => {
    editModal.close();
});


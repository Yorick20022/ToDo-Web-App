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
const closeEditModal = document.querySelector(".fa-solid fa-xmark");

function someFunc() {
    editModal.showModal()
}

function submitForm() {
    let form = document.getElementById("sortForm");
    form.submit();
}

function testFunc() {
    window.location.href = "afgerond.php";
}



document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("modifyButton").addEventListener("click", function (event) {
        redirectToModifyPage();
        event.preventDefault();
    });

    function redirectToModifyPage() {
        window.location.href = "modify.html";
    }
});


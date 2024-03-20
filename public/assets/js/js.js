const deleteBtns = document.querySelectorAll('.delete-btn');
const changeBtns = document.querySelectorAll('.change-btn');

deleteBtns.forEach(function(deleteBtn) {
    deleteBtn.addEventListener("click", function(e){
        if(confirm("Deseja remover esse item?")){
            this.form.submit();
        }
    })
});

changeBtns.forEach(function(changeBtn) {
    changeBtn.addEventListener("click", function(e){
        if(confirm("Deseja devolver esse item?")){
            this.form.submit();
        }
    })
});
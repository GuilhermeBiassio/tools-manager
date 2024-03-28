const deleteBtns = document.querySelectorAll('.delete-btn');
const enableBtns = document.querySelectorAll('.enable-btn');
const changeBtns = document.querySelectorAll('.change-btn');

deleteBtns.forEach(function(deleteBtn) {
    deleteBtn.addEventListener("click", function(e){
        if(confirm("Deseja remover esse item?")){
            this.form.submit();
        }
    })
});

enableBtns.forEach(function(enableBtn) {
    enableBtn.addEventListener("click", function(e){
        if(confirm("Deseja ativar esse funcionário?")){
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
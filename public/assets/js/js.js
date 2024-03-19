const deleteBtns = document.querySelectorAll('.delete-btn');

deleteBtns.forEach(function(deleteBtn) {
    deleteBtn.addEventListener("click", function(e){
        if(confirm("Deseja remover esse item?")){
            this.form.submit();
        }
    })
});

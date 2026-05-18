document.addEventListener('DOMContentLoaded', () => {

    // Modal Add FAQ
    const modalAdd = document.getElementById('modalAddFaq');
    const btnAdd = document.getElementById('btnAddFaq');
    const btnCloseAdd = document.getElementById('btnCloseAddFaq');
    const btnCancelAdd = document.getElementById('btnCancelAddFaq');

    const openAddModal = () => modalAdd.classList.add('active');
    const closeAddModal = () => modalAdd.classList.remove('active');

    btnAdd.addEventListener('click', openAddModal);
    btnCloseAdd.addEventListener('click', closeAddModal);
    btnCancelAdd.addEventListener('click', closeAddModal);
    modalAdd.addEventListener('click', (e) => {
        if (e.target === modalAdd) closeAddModal();
    });

    // Modal Edit FAQ
    const modalEdit = document.getElementById('modalEditFaq');
    const btnCloseEdit = document.getElementById('btnCloseEditFaq');
    const btnCancelEdit = document.getElementById('btnCancelEditFaq');

    const closeEditModal = () => modalEdit.classList.remove('active');

    btnCloseEdit.addEventListener('click', closeEditModal);
    btnCancelEdit.addEventListener('click', closeEditModal);
    modalEdit.addEventListener('click', (e) => {
        if (e.target === modalEdit) closeEditModal();
    });

    // Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeAddModal();
            closeEditModal();
        }
    });

    // Edit buttons
    const editBtns = document.querySelectorAll('.adminList__item--actions-edit');

    editBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const data = btn.dataset;

            document.getElementById('editFaqId').value = data.id;
            document.getElementById('editQuestion').value = data.question;
            document.getElementById('editAnswer').value = data.answer;
            document.getElementById('editOrder').value = data.order;

            modalEdit.classList.add('active');
        });
    });

});

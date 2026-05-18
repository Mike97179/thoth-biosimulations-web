document.addEventListener('DOMContentLoaded', () => {

    // Modal Add Partner
    const modalAdd = document.getElementById('modalAddPartner');
    const btnAdd = document.getElementById('btnAddPartner');
    const btnCloseAdd = document.getElementById('btnCloseAddPartner');
    const btnCancelAdd = document.getElementById('btnCancelAddPartner');

    const openAddModal = () => modalAdd.classList.add('active');
    const closeAddModal = () => modalAdd.classList.remove('active');

    btnAdd.addEventListener('click', openAddModal);
    btnCloseAdd.addEventListener('click', closeAddModal);
    btnCancelAdd.addEventListener('click', closeAddModal);
    modalAdd.addEventListener('click', (e) => {
        if (e.target === modalAdd) closeAddModal();
    });

    // Modal Edit Partner
    const modalEdit = document.getElementById('modalEditPartner');
    const btnCloseEdit = document.getElementById('btnCloseEditPartner');
    const btnCancelEdit = document.getElementById('btnCancelEditPartner');

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

            document.getElementById('editPartnerId').value = data.id;
            document.getElementById('editName').value = data.name;
            document.getElementById('editDescription').value = data.description;
            document.getElementById('editLogo').value = data.logo;
            document.getElementById('editUrl').value = data.url;
            document.getElementById('editOrder').value = data.order;

            modalEdit.classList.add('active');
        });
    });

});

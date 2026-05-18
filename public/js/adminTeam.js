document.addEventListener('DOMContentLoaded', () => {

    // Modal Add Member
    const modalAdd = document.getElementById('modalAddMember');
    const btnAdd = document.getElementById('btnAddMember');
    const btnCloseAdd = document.getElementById('btnCloseAddModal');

    const openAddModal = () => modalAdd.classList.add('active');
    const closeAddModal = () => modalAdd.classList.remove('active');

    btnAdd.addEventListener('click', openAddModal);
    btnCloseAdd.addEventListener('click', closeAddModal);
    modalAdd.addEventListener('click', (e) => {
        if (e.target === modalAdd) closeAddModal();
    });

    // Modal Edit Member
    const modalEdit = document.getElementById('modalEditMember');
    const btnCloseEdit = document.getElementById('btnCloseEditMemberModal');

    const closeEditModal = () => modalEdit.classList.remove('active');

    btnCloseEdit.addEventListener('click', closeEditModal);
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

            document.getElementById('editMemberId').value = data.id;
            document.getElementById('editName').value = data.name;
            document.getElementById('editRole').value = data.role;
            document.getElementById('editBio').value = data.bio;
            document.getElementById('editLinkedin').value = data.linkedin;
            document.getElementById('editOrder').value = data.order;
            document.getElementById('editFounder').checked = data.founder === '1';

            modalEdit.classList.add('active');
        });
    });

});

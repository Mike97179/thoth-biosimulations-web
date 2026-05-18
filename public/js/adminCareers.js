document.addEventListener('DOMContentLoaded', () => {

    // Modal New Position
    const modalNew = document.getElementById('modalNewPosition');
    const btnNew = document.getElementById('btnNewPosition');
    const btnCloseNew = document.getElementById('btnCloseNewPosition');

    const openNewModal = () => modalNew.classList.add('active');
    const closeNewModal = () => modalNew.classList.remove('active');

    btnNew.addEventListener('click', openNewModal);
    btnCloseNew.addEventListener('click', closeNewModal);
    modalNew.addEventListener('click', (e) => {
        if (e.target === modalNew) closeNewModal();
    });

    // Modal Edit Position
    const modalEdit = document.getElementById('modalEditPosition');
    const btnCloseEdit = document.getElementById('btnCloseEditPosition');

    const closeEditModal = () => modalEdit.classList.remove('active');

    btnCloseEdit.addEventListener('click', closeEditModal);
    modalEdit.addEventListener('click', (e) => {
        if (e.target === modalEdit) closeEditModal();
    });

    // Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeNewModal();
            closeEditModal();
        }
    });

    // Helper function for custom select
    const setCustomSelect = (selectId, inputId, value) => {
        const items = document.querySelectorAll(`#${selectId} .customSelect__list--item`);
        const btn = document.querySelector(`#${selectId} .customSelect__btn`);
        const input = document.getElementById(inputId);

        items.forEach(item => {
            item.classList.remove('active');
            if (item.dataset.value === value) {
                item.classList.add('active');
                btn.childNodes[0].textContent = item.textContent;
                input.value = value;
            }
        });
    };

    // Edit buttons
    const editBtns = document.querySelectorAll('.adminList__item--actions-edit');

    editBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const data = btn.dataset;

            document.getElementById('editPositionId').value = data.id;
            document.getElementById('editPositionTitle').value = data.title;
            document.getElementById('editPositionLocation').value = data.location;
            document.getElementById('editPositionDescription').value = data.description;
            document.getElementById('editPositionRequirements').value = data.requirements;
            document.getElementById('editPositionActive').checked = data.active === '1';

            setCustomSelect('editDepartmentSelect', 'editDepartmentValue', data.department);
            setCustomSelect('editTypeSelect', 'editTypeValue', data.type);

            modalEdit.classList.add('active');
        });
    });

    // Custom Selects
    const customSelects = document.querySelectorAll('.customSelect');
    customSelects.forEach(select => {
        const btn = select.querySelector('.customSelect__btn');
        const input = select.querySelector('input[type="hidden"]');
        const items = select.querySelectorAll('.customSelect__list--item');

        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            customSelects.forEach(s => {
                if (s !== select) s.classList.remove('open');
            });
            select.classList.toggle('open');
        });

        items.forEach(item => {
            item.addEventListener('click', () => {
                items.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
                btn.childNodes[0].textContent = item.textContent;
                input.value = item.dataset.value;
                select.classList.remove('open');
            });
        });
    });

    document.addEventListener('click', () => {
        customSelects.forEach(s => s.classList.remove('open'));
    });

});

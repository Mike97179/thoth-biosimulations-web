document.addEventListener('DOMContentLoaded', () => {

    // Modal New Tool
    const modalNew = document.getElementById('modalNewTool');
    const btnNew = document.getElementById('btnNewTool');
    const btnCloseNew = document.getElementById('btnCloseNewTool');

    const openNewModal = () => modalNew.classList.add('active');
    const closeNewModal = () => modalNew.classList.remove('active');

    btnNew.addEventListener('click', openNewModal);
    btnCloseNew.addEventListener('click', closeNewModal);
    modalNew.addEventListener('click', (e) => {
        if (e.target === modalNew) closeNewModal();
    });

    // Modal Edit Tool
    const modalEdit = document.getElementById('modalEditTool');
    const btnCloseEdit = document.getElementById('btnCloseEditTool');

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

    // Edit buttons
    const editBtns = document.querySelectorAll('.adminList__item--actions-edit');

    editBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const data = btn.dataset;

            document.getElementById('editToolId').value = data.id;
            document.getElementById('editToolName').value = data.name;
            document.getElementById('editToolDescription').value = data.description;
            document.getElementById('editToolOrder').value = data.order;

            // Set icon
            setCustomSelect('editToolIconSelect', 'editToolIconValue', data.icon);

            // Set category
            setCustomSelect('editToolCategorySelect', 'editToolCategoryValue', data.category);

            modalEdit.classList.add('active');
        });
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

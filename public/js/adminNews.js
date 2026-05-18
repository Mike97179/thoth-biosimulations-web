document.addEventListener('DOMContentLoaded', () => {

    // Modal New Post
    const modal = document.getElementById('modalNewPost');
    const btnOpen = document.getElementById('btnNewPost');
    const btnClose = document.getElementById('btnCloseModal');

    const openModal = () => modal.classList.add('active');
    const closeModal = () => modal.classList.remove('active');

    btnOpen.addEventListener('click', openModal);
    btnClose.addEventListener('click', closeModal);

    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });

    // Modal Edit Post
    const modalEdit = document.getElementById('modalEditPost');
    const btnCloseEdit = document.getElementById('btnCloseEditModal');

    const closeEditModal = () => modalEdit.classList.remove('active');

    btnCloseEdit.addEventListener('click', closeEditModal);

    modalEdit.addEventListener('click', (e) => {
        if (e.target === modalEdit) closeEditModal();
    });

    // Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeModal();
            closeEditModal();
        }
    });

    // Edit buttons
    const editBtns = document.querySelectorAll('.adminList__item--actions-edit');

    editBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const data = btn.dataset;

            document.getElementById('editId').value = data.id;
            document.getElementById('editTitle').value = data.title;
            document.getElementById('editSummary').value = data.summary;
            document.getElementById('editDate').value = data.date;

            // Set category
            const categoryItems = document.querySelectorAll('#editCategorySelect .customSelect__list--item');
            const categoryBtn = document.querySelector('#editCategorySelect .customSelect__btn');
            const categoryInput = document.getElementById('editCategoryId');

            categoryItems.forEach(item => {
                item.classList.remove('active');
                if (item.dataset.value === data.category) {
                    item.classList.add('active');
                    categoryBtn.childNodes[0].textContent = item.textContent;
                    categoryInput.value = data.category;
                }
            });

            // Set published
            const publishedCheck = document.getElementById('editPublished');
            publishedCheck.checked = data.published === '1';

            modalEdit.classList.add('active');
        });
    });

    // Custom Select
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
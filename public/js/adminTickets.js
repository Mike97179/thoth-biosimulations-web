document.addEventListener('DOMContentLoaded', () => {

    const modal = document.getElementById('modalTicket');
    const btnClose = document.getElementById('btnCloseTicket');
    const btnCloseModal = document.getElementById('btnCloseTicketModal');
    const ticketItems = document.querySelectorAll('.adminList__item--clickable');

    let currentTicketId = null;

    const saveAndClose = () => {
        const status = document.getElementById('ticketStatusValue').value;
        if (currentTicketId) {
            fetch('/admin/tickets/status', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `id=${currentTicketId}&status=${status}`
            }).then(() => {
                modal.classList.remove('active');
                location.reload();
            });
        } else {
            modal.classList.remove('active');
        }
    };

    btnClose.addEventListener('click', saveAndClose);
    btnCloseModal.addEventListener('click', saveAndClose);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) saveAndClose();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') saveAndClose();
    });

    ticketItems.forEach(item => {
        item.addEventListener('click', () => {
            const data = item.dataset;
            currentTicketId = data.id;

            document.getElementById('ticketModalTitle').textContent = `Ticket from ${data.name}`;
            document.getElementById('ticketEmail').textContent = data.email;
            document.getElementById('ticketOrganization').textContent = data.organization;
            document.getElementById('ticketArea').textContent = data.area;
            document.getElementById('ticketMessage').textContent = data.message;

            // Set status
            const statusItems = document.querySelectorAll('#ticketStatusSelect .customSelect__list--item');
            const statusBtn = document.querySelector('#ticketStatusSelect .customSelect__btn');
            const statusInput = document.getElementById('ticketStatusValue');

            statusItems.forEach(si => {
                si.classList.remove('active');
                if (si.dataset.value === data.status) {
                    si.classList.add('active');
                    statusBtn.childNodes[0].textContent = si.textContent;
                    statusInput.value = data.status;
                }
            });

            // If new → change to read
            if (data.status === 'new') {
                const badge = item.querySelector('.label');
                badge.className = 'label label--read';
                badge.textContent = 'read';
                item.dataset.status = 'read';

                statusItems.forEach(si => {
                    si.classList.remove('active');
                    if (si.dataset.value === 'read') {
                        si.classList.add('active');
                        statusBtn.childNodes[0].textContent = 'Read';
                        statusInput.value = 'read';
                    }
                });

                const newItems = document.querySelectorAll('.label--new');
                const counter = document.querySelector('.adminTicketsCount');
                if (counter) {
                    counter.textContent = `${newItems.length} new`;
                }
            }

            modal.classList.add('active');
        });
    });

    // Delete button
    document.getElementById('btnDeleteTicket').addEventListener('click', () => {
        if (currentTicketId && confirm('Are you sure you want to delete this ticket?')) {
            window.location.href = `/admin/tickets/delete?id=${currentTicketId}`;
        }
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
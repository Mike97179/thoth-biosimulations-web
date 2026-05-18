<?php include VIEW_LAYOUT . DS . 'head.php'; ?>

<div class="adminLayout">
    <?php include VIEW_ADMIN . DS . 'layout' . DS . 'sidebar.php'; ?>

    <main class="adminMain">
        <div class="adminNewsHeader">
            <h1>Tickets / Messages</h1>
            <span class="adminTicketsCount"><?php echo getNewTicketsCount(); ?> new</span>
        </div>

        <div class="adminList">
            <?php getTickets(); ?>
        </div>
    </main>
</div>

<!-- Modal Ticket -->
<div class="adminModal" id="modalTicket">
    <div class="adminModal__card">
        <div class="adminModal__card__header">
            <h2 id="ticketModalTitle">Ticket from Dr. Sarah Johnson</h2>
            <button class="adminModal__card__header--close" id="btnCloseTicket">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="adminTicket">
            <div class="adminTicket__meta">
                <p><span>Email:</span> <strong id="ticketEmail"></strong></p>
                <p><span>Organization:</span> <strong id="ticketOrganization"></strong></p>
                <p><span>Research Area:</span> <strong id="ticketArea"></strong></p>
            </div>
            <div class="adminTicket__message">
                <p id="ticketMessage"></p>
            </div>
            <div class="adminTicket__status">
                <label>Status:</label>
                <div class="customSelect" id="ticketStatusSelect">
                    <button type="button" class="customSelect__btn">
                        New
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <ul class="customSelect__list">
                        <li class="customSelect__list--item" data-value="new">New</li>
                        <li class="customSelect__list--item" data-value="read">Read</li>
                        <li class="customSelect__list--item" data-value="replied">Replied</li>
                    </ul>
                    <input type="hidden" id="ticketStatusValue" value="new">
                </div>
            </div>
            <div class="adminModal__card__buttons">
                <button type="button" class="btn btn--red" id="btnDeleteTicket">
                    <i class="fa-regular fa-trash-can"></i>
                    Delete
                </button>
                <button type="button" class="btn btn--white" id="btnCloseTicketModal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="/js/adminTickets.js"></script>

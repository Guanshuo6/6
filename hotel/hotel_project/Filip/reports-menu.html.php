<!-- 
    Screen:         Reports Menu
    Purpose:        Displaying options to view reports
    Student ID:     C00288344
    Student Name:   Filip Melka
    Date:           April 2024
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reports Menu</title>
    <link rel="stylesheet" href="./css/staff-shared.css" />
    <link rel="stylesheet" href="./css/staff-menu.css" />
</head>

<body>
    <?php
    session_start();

    // check that the user is logged in
    if (!isset($_SESSION['user'])) {
        $_SESSION["redirect"] = "https://c2p-hotel.candept.com/hotel_project/Filip/reports-menu.html.php";
        header("Location: https://c2p-hotel.candept.com/hotel_project/login.html");
    }

    /* include navbar */
    include "navbar.php";
    ?>
    <h2>Reports Menu</h2>
    <!-- Menu container -->
    <div id="menu"></div>

    <script>
        /* menu options */
        const options = [{
                emoji: '🛎️',
                title: 'Guest Stays Report',
                description: 'View guest stays report',
                color: 'var(--add)',
                link: './guest-report.html.php',
            },
            {
                emoji: '📈',
                title: 'Stock Report',
                description: 'View stock report',
                color: 'var(--delete)',
                link: '../stock-report.html.php',
            },
            {
                emoji: '📦',
                title: 'Orders Report',
                description: "View orders report",
                color: 'var(--view)',
                link: '../order-report.html.php',
            },
            {
                emoji: '👋',
                title: 'Exit',
                description: '',
                color: 'var(--exit)',
                link: '../menu.html',
            },
        ]

        let cards = '' /* stores the HTML string for all option cards */

        /* loop hrough the options and append the HTML Card string to 'cards' variable */
        options.forEach((option) => {
            cards += `
                    <a
                        href="${option.link}"
                        class="card"
                        onmouseenter="this.style.background='${option.color}'"
                        onmouseleave="this.style.background='var(--bg)'"
                    >
                        <div class="menu-icon" style="background: ${option.color}">${option.emoji}</div>
                        <div>
                            <p>${option.title}</p>
                            <p>${option.description}</p>
                        </div>
                    </a>
                `
        })

        /* set the 'cards' as the inner HTML of 'menu' container */
        document.getElementById('menu').innerHTML = cards
    </script>
</body>

</html>
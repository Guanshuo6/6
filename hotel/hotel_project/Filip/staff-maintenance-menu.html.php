<!-- 
    Screen:         Staff Maintenance Menu
    Purpose:        Displaying options for staff-related tasks
    Student ID:     C00288344
    Student Name:   Filip Melka
    Date:           April 2024
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Staff Menu</title>
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link rel="stylesheet" href="./css/staff-shared.css" />
    <link rel="stylesheet" href="./css/staff-menu.css" />
</head>

<body>
    <?php
    session_start();

    // check that the user is logged in
    if (!isset($_SESSION['user'])) {
        $_SESSION["redirect"] = "https://c2p-hotel.candept.com/hotel_project/Filip/staff-maintenance-menu.html.php";
        header("Location: https://c2p-hotel.candept.com/hotel_project/login.html");
    }

    /* include navbar */
    include "navbar.php";

    /* set 'attempt' session variable to 0 */
    $_SESSION['attempt'] = 0;
    ?>
    <h2>Staff Maintenance Menu</h2>
    <!-- Menu container -->
    <div id="menu"></div>

    <script>
        /* menu options */
        const options = [{
                emoji: '👨🏻‍💼',
                title: 'Add a Staff Member',
                description: 'Add a new staff member to the Staff table',
                color: 'var(--add)',
                link: './add-staff-member.html.php',
            },
            {
                emoji: '🗑️',
                title: 'Delete a Staff Member',
                description: 'Remove a staff member from the Staff table',
                color: 'var(--delete)',
                link: './delete-staff-member.html.php',
            },
            {
                emoji: '📋',
                title: 'Amend / View a Staff Member',
                description: "Amend or view staff member's details",
                color: 'var(--view)',
                link: './amend-staff-member.html.php',
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
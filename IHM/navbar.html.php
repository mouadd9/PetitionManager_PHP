<!-- IHM/navbar.html.php -->
<nav class="navbar">
    <ul>
        <li><a href="index.php?action=liste_petition">Petitions</a></li>
        <li><a href="index.php?action=petition_form">New Petition</a></li>
    </ul>
</nav>

<style>
    .navbar {
        background-color: #333;
        padding: 10px;
    }
    .navbar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
    }
    .navbar li {
        margin-right: 20px;
    }
    .navbar a {
        color: white;
        text-decoration: none;
        font-size: 18px;
    }
    .navbar a:hover {
        text-decoration: underline;
    }
</style>
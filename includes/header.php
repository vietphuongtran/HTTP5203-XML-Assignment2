<header>
    <?php
    function navigation () {
        echo "<ul>";
        $navigation = ['Home.com' => 'Home', 'About.com' => 'About', 'News.com' => 'News', 'services.com' => 'Our Services', 'contact.com' => 'Contact'];
        foreach ($navigation as $key => $value) {
            echo '<li><a href="/">'.$value.'</a></li>';
        }
        echo "</ul>";
    }
    ?>
    <div id="navigation-bar">
        <?php
        navigation();
        ?>
    </div>
    <div class="flex-container">
        <div id="logo">
            <a href="#"><img id ="logo_image" src="image/technical-support.png" alt="Logo of the company" /></a>
            <!--This logo was downloaded from Pinterest used by Paul Tran for educational purposes -->
        </div>
        <div id="company_name">
            <h1>Paul Tran Tech</h1>
        </div>
        <div id="contact">
            <img id="hotline_symbol" src ="image/hotline.png" alt="A hotline symbol" /> Hotline: (647) 123 4567
        </div>
    </div>
</header>
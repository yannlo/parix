        <header id="section_ad_header">
            <nav class="navBar">

                <input type="checkbox" id="check">

                <label for="check" class="checkbtn">

                    <i class="fas fa-bars" id="icon"></i>

                </label>

                <label for="logo"><img src="../images/logo1.png" alt="logo parix"></label>

                <ul>
                    <li> <a href="reservation.php" id="reserved_link">RESERVATIONS</a></li>
                    <li> <a href="menu.php" id="menu_link">MENU</a></li>
                    <li> <a href="commande.php" id="commande_link">COMMANDES</a></li>
                    <li id="discon"> <a href="deconnection.php" id="disconnected" title="déconnexion"><i class="fas fa-sign-out-alt"></i></a></li>
                </ul>

            </nav>

        </header>


        <script>
        
        function actived_link_page(valeur){
		const link1 = document.getElementById('reserved_link');
		const link2 = document.getElementById('commande_link');
		const link3 = document.getElementById('menu_link');
		switch (valeur) {
			case 'reservation':
				link1.setAttribute("class", "active");
				console.log('ok');
				break;
			case 'commande':
				link2.setAttribute("class", "active");
				console.log('ok');
				break;
			case 'menu':
				link3.setAttribute("class", "active");
				console.log('ok');
				break;
		
			default:
				console.log('error');
				break;
		}

	}

        </script>
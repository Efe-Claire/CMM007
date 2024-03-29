<!DOCTYPE html>
<html>
<head>
    <title>Harry Potter Landmarks</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
	<link rel="stylesheet" href="assets/unsemantic-grid-responsive-tablet.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
				<li><a href="landmarks.html">Landmarks</a></li>
				<li><a href="Stories.html">Stories</a></li>
				<li><a href="Reviews.php">Reviews</a></li>
            </ul>
        </nav>
    </header>
    <h1>Harry Potter Landmarks</h1>
    <p>Share your Harry Potter experiences with us:</strong></p>

    <main>
        <section>
            <h2>Stories</h2>
            <p>Share your stories and experiences about your visit to these Harry Potter landmarks:</p>
            <form method="POST" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <br>
                <input type="text" id="name" name="name">
                <br><br>
                                    
                <label for="email">Email:</label>
                <br>
                <input type="email" id="email" name="email">
                <br><br>
                                    
                <label for="story">Story:</label>
                <br>
                <textarea id="story" name="story" rows="5" cols="50"></textarea>
                <br><br>
        
                <label for="file-upload">Upload a file:</label>
                <input type="file" id="file-upload" name="file-upload">
        
                <input type="submit" value="Submit">
            </form>
        </section>
        <section>
            <h2>Reviews</h2>
            <p>Here are some reviews from our users:</p>
            <ul>
                <li>"I loved visiting Hogwarts School of Witchcraft and Wizardry! The attention to detail was incredible and it really felt like I was walking through the castle."</li>
                <li>"Diagon Alley was absolutely amazing. The shops, the wand selection, the butterbeer! Everything was perfect."</li>
                <li>"The Forbidden Forest was so spooky and mysterious. I loved the feeling of being lost in the woods."</li>
                <li>"The Ministry of Magic was incredible. The architecture, the security measures, and the wizarding technology were all so impressive."</li>
                <li>"Hogsmeade Village was charming and picturesque. I loved exploring the shops and trying all the wizarding treats."</li>
            </ul>
        </section>
    </main>
    <footer>
		<h2>Connect with Us</h2>
		<ul>
			<li><a href="http://www.facebook.com"><img src="Images/facebook.jpeg" alt="Facebook" id="facebook" style="width: 30px; height: 30px;"></a></li>
			<li><a href="http://www.twitter.com"><img src="Images/twitter-logo.png" alt="Twitter" id="twitter-logo" style="width: 30px; height: 30px;"></a></li>
			<li><a href="http://www.youtube.com"><img src="Images/youtube.jpeg" alt="Youtube" id="youtube" style="width: 30px; height: 30px;"></a></li>
		</ul>
		<p>&copy; 2023 Harry Potter Landmarks. All rights reserved.</p>
	</footer>

</body>
</html>

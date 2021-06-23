<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5, tags" />
    <meta name="author" content="Jamie Kozminska" />
    <link href="styles/style.css" rel="stylesheet" type="text/css" />
    <title>Web Accessibility</title>
</head>

<body class="page-background">
    <section>
        <h1>Web Accessibility</h1>

        <nav id=menu>
            <a href="index.php">
                <p class="menu">Home</p>
            </a>

            <a href="topic.php">
                <p class="menu">Topic Information</p>
            </a>

            <a href="quiz.php">
                <p class="menu">Quiz</p>
            </a>
            <a href="phpenhancements.php">
                <p class="menu">Enhancements</p>
            </a>
            <a href="manage.php">
                <p class="menu">Supervisor</p>
            </a>
        </nav>
    </section>

    <section>
        <div class="seg1">
            <div>
                <h2>What is Web Accessibility?</h2>
            </div>

            <div>
                <p>Web Accessibility, also known as A11y (a then 11 characters then y), means allowing many possible
                    ways of accesssing Websites, even for the disabled.</p>
                <p>Accessibility to the Web gives the opportunity for those who are disabled to <strong>access</strong>
                    the internet, and for many, makes things as easy as possible.</p>
                <p>No matter the barrier, being language, culture, location, software, physical or mental ability, it is
                    designed to work for <strong>all</strong> people.</p>
            </div>
        </div>
    </section>

    <section>
        <div class="seg2">
            <div>
                <h2>Who Developed it and when?</h2>
            </div>
            <div>
                <p>The World Wide Web Consortium (W3C) Web Accessibility Initiative are responsible for managing and
                    designing the guidelines for web accessibility. In 1999 the Web Accessibility Initiative published
                    the Web Content Accessibility Guidelines WCAG 1.0. They are audited through automated tools, with
                    expert technical reviews, and user testing; which all keep the guidelines up to date. </p>
                <p>Because of the growth of the internet and its usage. The importance of keeping a consistency in
                    guidelines and tools to make Web Accessibility as easy for all users is always growing. As new
                    technologies are released and updated, so too do the guidelines for what is deemed "standard".</p>
            </div>
        </div>
    </section>

    <section>
        <div class="seg3">
            <div>
                <h2>What Technologies are used to increase Web Accessibility?</h2>
            </div>
            <div>
                <ul>
                    <li class="listfloater">Screen Readers</li>
                    <li class="listfloater">Screen Magnification Software</li>
                    <li class="listfloater">Alternative input devices</li>
                    <li class="listfloater">Head pointers</li>
                    <li class="listfloater">Motion tracking or eye tracking</li>
                    <li class="listfloater">Single switch entry devices</li>
                    <li class="listfloater">Speech input software</li>
                </ul>
            </div>
        </div>
    </section>

    <div class="seg4">
        <aside>
            <div class="list-font">
                <h3>Benefits of accessibility include:</h3>
                <ul class="list-font">
                    <li>Semantic HMTL improves accessibility, making your site more findable.</li>
                    <li>Demonstrates good morals and ethics, improving public image.</li>
                    <li>Makes is easier for mobile phone usersa nd those with low network speed.</li>
                </ul>
            </div>
        </aside>
    </div>

    <section id="tables">
        <h2>What ways can accessibility assist certain impairments?</h2>
        <table>
            <caption>Table of impairments</caption>
            <thead>
                <tr>
                    <th scope="col">Impairment</th>
                    <th scope="col" colspan="2">Technology</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Visual</th>
                    <td>Screen readers(reads digital text aloud)</td>
                    <td>Zoom features</td>
                </tr>
                <tr>
                    <th scope="row">Hearing</th>
                    <td>Textual transcripts of videos</td>
                    <td>Assistive devices</td>
                </tr>
                <tr>
                    <th scope="row">Mobility</th>
                    <td>Controls via keyboards</td>
                    <td>Head pointers</td>
                </tr>
                <tr>
                    <th scope="row">Cognitive</th>
                    <td>Delivering content in multiple formats</td>
                    <td>focused attention on important content</td>
                </tr>
            </tbody>
        </table>
        <img class="Image1"
            src="https://www.outsystems.com/blog/-/media/images/blog/posts/building-web-accessibility-barriers-guidelines-standards/building-web-accessibility-barriers-guidelines-standards_01.jpg?h=284&w=750/"
            alt="Web Accessibility" />

    </section>

    <section>
        <div class="seg5">
            <h2>Different ways to increase accessibility</h2>
            <div>
                <ol>
                    <li><strong>HTML workflow</strong></li>
                </ol>
                <ul>
                    <li>Easier to develop with. Better functionality and easier to understand.</li>
                    <li>Better on mobile. Lighter in file size and potentially more responsive</li>
                    <li>Good for optimising search engines by looking for keywords.</li>
                </ul>
            </div>
            <div>
                <ol start="2">
                    <li><strong>Best practices for CSS and JavaScript</strong></li>
                </ol>

                <ul>
                    <li>Marking up headings correctly makes for easier navigation.</li>
                    <li>Colour co-ordination allows for better understandings.</li>
                    <li>Links</li>
                    <li>Emphasised text, abbreviations, tables</li>
                    <li>Hiding some content to reduce overwhelming information.</li>
                </ul>
            </div>
            <div>
                <ol start="3">
                    <li><strong>WAI-ARIA</strong></li>
                </ol>
                <ul>
                    <li>Signposts/Landmarks. </li>
                    <li>Dynamic content updates</li>
                    <li>Enhacing keyboard accessibility</li>
                    <li>Accessibility of non-semantic controls</li>
                </ul>
            </div>
            <div>
                <ol start="4">
                    <li><strong>Multimedia</strong></li>
                </ol>
                <ul>
                    <li>Creating accessible audio and video controls via the keyboard</li>
                    <li>Video text tracks(subtitles)</li>
                </ul>
            </div>
            <div>
                <ol start="5">
                    <li><strong>Accessibility on mobile</strong></li>
                </ol>
                <ul>
                    <li>Control mechanisms. Making sure buttons are accessible on touchscreens.</li>
                    <li>User input. Keeping forms to a minimum on mobiles.</li>
                    <li>Responsive design. Layouts are scaleable and work on mobiles with smaller screens.</li>
                </ul>
            </div>
        </div>
    </section>
    <footer id="topicfooter">
        <a href="mailto:101114436@student.swin.edu.au">Email student: 101114436</a>
    </footer>
</body>

</html>
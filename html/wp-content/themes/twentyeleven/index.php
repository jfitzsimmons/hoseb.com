<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

<!-- body animations -->
<div id="clouds"></div>
<div id="bird01" class="birds"></div>
<div id="bird02" class="birds"></div>
<div id="bird03" class="birds"></div>

<section class="section1" id="home">
<div id="sun2"></div>
	<div class="myname top-level"><h1>Joe Fitzsimmons</h1><h2>Web Developer</h2></div>
</section>
<section id="skills" class="section2">
    <div class="skills top-level">
        <p>My skills include (but are not limited to):</p>
        <div class="skillsbga">
            <table align="center">
                <tr>
                    <td>HTML</td>
                    <td>CSS</td>
                    <td>JavaScript</td>
                </tr>
                <tr>
                    <td>PHP</td>
                    <td>SASS</td>
                    <td>jQuery</td>
                </tr>
                <tr>
                    <td>WordPress</td>
                    <td>eCommerce</td>
                    <td>JSON</td>
                </tr>
                <tr>
                    <td>XML</td>
                    <td>SQL</td>
                    <td>AJAX</td>
                </tr>
            </table>
        </div>
        <h2>Want More?</h2>
        <p>Here is my <b><a href="JosephFitzsimmons-Resume.pdf" target="_BLANK">full resume</a></b></p>
    </div>
</section>

<section id="work" class="section5">
<div class="work">
<h2>Work</h2>
<p>Most recently I've worked for New Balance on their international sites in the US, Canada, UK, China, Japan, Australia and New Zealand.  I've also worked on their family of brands which include Warrior US and UK, PF Flyers and Cobb Hill Shoes.
</p>
<p>
Previously I worked for Scottrade on their internal sites where I had a number of roles from Business Analyst to Developer.
</p>
<p>
    In my own time I've worked on sites for the band Last Night's Vice, Apple of Your Eye Learning Center, Effective Writing Services, Enoxor Epoxies, Integrated Safety and Utility, and graphic designer Corinne Nagel: <a href="http://corinnenagel.com">corinnenagel.com</a>.
</p>
</div>
</section>

<section id="about" class="section4">
    <div class="about">
        <h2>Who is Joe?</h2>
        <ul>
            <li>I have spent my career in IT, Internal Communications and Marketing departments working on the web.</li>
            <li>I work towards pixel perfection. </li>
            <li>I have an unhealthy obsession with the St. Louis Blues. </li>
        </ul>
    </div>
</section>

<section class="section3" id="contact">
    <div class="contact top-level">
        <h1>CONTACT</h1>
        <h2>joe [at] hoseb [dot] com</h2>
    </div>
</section>
	
<?php get_footer(); ?>
# mrc-theme

*A child theme of the offical Tweny Seventeen WordPress theme*

This child theme was made in order to implement customizations to the default presentation and page types for the Mohawk Reformed Church website.

The modifications to the default Twenty Seventeen appearance and functionality shouldn't be very advanced. Not all of the aesthetic code that affects the MRC website is reflected here, because WordPress allows CSS to be inserted through the Customizer.

Several additions to the child theme were made before this repository was published. They include:
- **community.php** -- A copy of *page.php* from the default Twenty Seventeen template, with the addition of the Facebook widget include script -- specifically the part of the script that goes inside the page content where the widget appears. The file's naming convention is intended to indicate that it's intended to be used with the page named "Community," which is concatenated onto the homepage as part of the theme layout. However, the use of this page template with the page named "Community" is not hard-coded. Instead, it's selected from the *template* drop-down list in the WordPress interface. This allows the user to effectively disable the Facebook widget by choosing the default template instead of this one.
- **front-page.php** -- A clone of the default *front-page.php*, the only modification being the inclusion of the other part of the Facebook widget code, the part that comes at the top of the page. This means that even if the user does disable the Facebook widget by selecting the default template for the Community page, some Facebook JavaScript will still be loaded onto the page, which would be very inefficient.
- **.gitignore** -- At first commit, the gitignore file prevented a modified clope of 'content-front-page-panels.php' from being uploaded. That modified file contains an experiment with adding new CSS classes to some of containers around some of the content only specific sections that get concatenated onto the homepage. It was renamed with a ".back" extension in order to disable it and to return to the default functionality for now, and the ".back" extension is used by the gitignore.

Feel free to use or modify this child theme for your own website.

--- P.L., 4/20/2017
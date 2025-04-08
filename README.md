# Reddit Lite WordPress Theme

## Description
Reddit Lite is a Reddit-inspired WordPress theme with professional enhancements, including a voting system, responsive design, and a modular layout.

## Installation
1. Upload the `reddit-lite` folder to the `/wp-content/themes/` directory.
2. Activate the theme through the 'Appearance' menu in WordPress.
3. (Optional) Add a `screenshot.png` file (recommended size: 1200x900px) to the theme root to display in the WordPress theme selection screen.

## Customization
- **Styles**: Add your custom styles in `custom/custom-styles.css`.
- **Functions**: Add your custom PHP functions in `custom/custom-functions.php`.
- **Templates**: Create custom page templates by copying `custom/custom-template.php` and modifying it.
- **Child Themes**: Create a child theme to safely modify templates and styles without losing changes during updates.
- **Menus**:
  - **Top Navigation**: Create a menu in `Appearance > Menus` and assign it to the "Top Navigation" location.
  - **Topics Menu**: Create a menu for the "Topics" section in the left sidebar and assign it to the "Topics Menu" location. Add custom classes (e.g., `internet-culture`, `games`) to menu items to map them to Font Awesome icons.
  - **Resources Menu**: Create a menu for the "Resources" section in the left sidebar and assign it to the "Resources Menu" location.
  - **Footer Links Menu**: Create a menu for the footer links at the bottom of the page and assign it to the "Footer Links Menu" location.
- **Widgets**:
  - **Right Sidebar**: Add widgets to the "Right Sidebar" area in `Appearance > Widgets`. Use the "Reddit Lite Communities" widget to create a list of popular communities (format: `name|url|members`).
  - **Footer**: Add widgets to the "Footer" area in `Appearance > Widgets` to display additional content above the footer links and copyright notice.
- **Customizer**:
  - **General Settings**:
    - Set the number of top posts to display.
    - Customize the search placeholder text in `Appearance > Customize > General Settings`.
    - Upload a logo image and set custom logo text in `Appearance > Customize > General Settings`.
  - **Login Page Settings**:
    - Customize the login page title, description, and button text in `Appearance > Customize > Login Page Settings`.
  - **Footer Settings**:
    - Customize the copyright text in `Appearance > Customize > Footer Settings`.
- **Search Customization**:
  - Use the `reddit_lite_exclude_search_categories` filter in `custom/custom-functions.php` to exclude categories from search results.
  - Use the `reddit_lite_search_query` filter to modify the search query.
- **Translations**:
  - The theme is translation-ready. Use the `languages/reddit-lite.pot` file to create translations for your language.
- **Responsive Behavior**:
  - On mobile devices (768px and below), the left sidebar (containing the "Communities" and "Resources" menus) becomes a collapsible off-canvas menu. Tap the hamburger icon in the top-left corner to toggle the sidebar.
- **Login Page**:
  - Create a new page in WordPress and assign the "Login Page" template (via Page Attributes).
  - Customize the login page title, description, and button text in `Appearance > Customize > Login Page Settings`.
  - The page displays a login form for logged-out users, a message for logged-in users, and links for registration (if enabled) and password recovery.

## Features
- Voting system for posts (upvote/downvote) with immediate updates via AJAX, vote history tracking, and visual feedback.
- Responsive design, with a collapsible left sidebar on mobile devices.
- Top posts section (customizable count).
- Sorting tabs (Hot, Everywhere).
- Dynamic menus for Topics and Resources in the left sidebar.
- Widgetized right sidebar and footer.
- Footer at the bottom of the page with a dynamic menu for links, a professional widget area, and a customizable copyright notice.
- Customizable logo in the top navigation with an optional image and text.
- Enhanced search functionality with a custom search form, search results page, and highlighted search terms.
- Dedicated templates for pages (`page.php`), archives (`archive.php`), 404 errors (`404.php`), comments (`comments.php`), and a custom login page (`page-login.php`).
- Translation-ready with a `.pot` file in the `languages` directory.

## Support
For support, contact [your email or website].
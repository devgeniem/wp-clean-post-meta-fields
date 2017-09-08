![geniem-github-banner](https://cloud.githubusercontent.com/assets/5691777/14319886/9ae46166-fc1b-11e5-9630-d60aa3dc4f9e.png)

# WP Clean Meta Fields

This plugin deletes Advanced Custom Field data from unrelevant templates after the template is changed.

This

    - Keeps the post meta clean from unrelevant data.
    - Avoids 'leaks' where data that is meant for a different page template is displayed by accident.
    - And thus opens up the possibility to write D.R.Y templates.

## Requirements
[Advanced Custom Fields](https://advancedcustomfields.com) - This plugin does absolutely nothing if Advanced Custom Fields (ACF) is not installed.

## Example
1. User creates a page with any template, for example 'Page with Sidebar'.
2. User inputs data to that template's custom metaboxes created with ACF.
3. User saves the content and thus data in ACF metaboxes is saved to the post meta.
4. User changes the template to a template that does not include sidebar.
5. User stores data again but the old sidebar-related data is still there in the post meta.

### The problem
In the theme we have written templates that use the same base so that in the template we check if any sidebar-related data exists, and show the sidebar if it does: because the data still exists in the post meta, the sidebar is displayed even though the user has changed the template.


### Solution
If the template has been changed, the plugin removes all ACF related post meta on post save. After this, only the current template's data is stored back.
This keeps the post meta clean and makes sure only the relevant data exists.

Now go on, write those D.R.Y templates and enjoy your clean post meta!

*NOTE* Please support revisions in your custom post types that are using templates so users does not lose data.

## Maintainers

[@pikkulahti](https://github.com/pikkulahti)

## License

GPLv3

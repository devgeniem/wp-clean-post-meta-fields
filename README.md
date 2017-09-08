![geniem-github-banner](https://cloud.githubusercontent.com/assets/5691777/14319886/9ae46166-fc1b-11e5-9630-d60aa3dc4f9e.png)

# WP Clean Meta Fields

This plugin deletes Advanced Custom Field data from unused templates after template change.
This
    - Keeps the post meta clean from unrelevant data
    - Avoids 'leaks' where data meant for different page template is displayed on other template.
    - And thus opens up the possibility to write D.R.Y templates.

## Requirements
[Advanced Custom Fields](https://advancedcustomfields.com) - This plugin does absolutely nothing if ACF is not installed.
This is super useful with [Dustpress](https://github.com/devgeniem/dustpress) but works without it.

## Example
- User creates page with some page template, for example 'Page with Sidebar'.
- User inputs data to that template's custom metaboxes created with Advanced Custom Fields (ACF).
- User saves the content and thus data in ACF metaboxes is saved into post meta.
- User changes the template for something different and the metaboxes change accordingly.
- User stores data again but the old data is still there in the post meta.

In theme we have written templates that use the same base so that in theme template we check for data stored in sidebar based metabox and show sidebar if that data is set: Because the data still exists in the post meta the sidebar is displayed even the user changed the post template.

By removing the ACF data on template change we keep the post meta clean and make sure only the data that is relevant is used.

Now go on and write those D.R.Y templates and enjoy your clean post meta!

*Note* please support revisions in your custom post types that are using templates so users does not lose data.

## Maintainers

[@pikkulahti](https://github.com/pikkulahti)

## License

GPLv3

# Databblead WordPress Theme

A professional WordPress theme converted from a Lovable project, featuring data intelligence and lead generation services.

## Features

- **Modern Design**: Dark theme with gradient accents and smooth animations
- **SEO Optimized**: Built-in SEO best practices and structured data
- **Facebook Pixel Integration**: Conversion tracking and retargeting ready
- **Mobile Responsive**: Fully optimized for all device sizes
- **Performance Optimized**: Fast loading with lazy loading and optimized assets
- **Contact Form Ready**: Built-in contact form with spam protection
- **Accessibility**: WCAG compliant with proper ARIA labels and keyboard navigation

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- Modern browser support

## Installation

1. Download the theme as a ZIP file
2. In WordPress admin, go to Appearance > Themes
3. Click "Add New" then "Upload Theme"
4. Select the databblead-theme.zip file
5. Click "Install Now" and then "Activate"

## Setup

### 1. Facebook Pixel Configuration
The theme includes Facebook Pixel (ID: 935994881952122) for conversion tracking. To update or modify:
- Edit `functions.php` and locate the `databblead_facebook_pixel()` function
- Replace the pixel ID with your own

### 2. Contact Form
The theme includes a built-in contact form. For enhanced functionality, install Contact Form 7:
- Install and activate Contact Form 7 plugin
- Create a new form with ID "1"
- The theme will automatically use the plugin if available

### 3. SEO Settings
The theme includes basic SEO optimization. For advanced features, consider installing:
- Yoast SEO
- Rank Math
- All in One SEO Pack

### 4. Customization
Use the WordPress Customizer to:
- Upload your logo
- Set custom colors
- Configure header and footer
- Add widgets to sidebar and footer areas

## Theme Structure

```
databblead-theme/
├── style.css              # Main stylesheet with theme header
├── index.php              # Main template file
├── functions.php          # Theme functions and features
├── header.php             # Header template
├── footer.php             # Footer template
├── page.php               # Static page template
├── single.php             # Single post template
├── archive.php            # Archive template
├── screenshot.png         # Theme preview image
├── assets/
│   ├── css/
│   │   └── custom.css     # Additional styles
│   ├── js/
│   │   ├── main.js        # Main JavaScript
│   │   └── scroll.js      # Scroll utilities
│   └── images/
│       └── (theme images)
└── README.md              # This file
```

## Customization

### Colors
The theme uses CSS custom properties for easy color customization. Edit `style.css` to modify:
- `--primary`: Main brand color
- `--data-stream`: Accent color for data elements
- `--background`: Main background color
- `--foreground`: Text color

### Fonts
The theme uses Inter font by default. To change fonts:
1. Edit the Google Fonts import in `style.css`
2. Update the font-family in the body selector

### Layout
The theme is designed as a single-page layout but supports WordPress pages and posts. To modify the homepage:
1. Edit `index.php` for the main structure
2. Add custom page templates as needed

## JavaScript Features

### Analytics Tracking
The theme includes comprehensive tracking for:
- Form submissions
- Button clicks
- Scroll depth
- Section visibility
- Exit intent

### Animations
- Smooth scrolling
- Fade-in animations
- Parallax effects
- Button hover effects

### Mobile Features
- Responsive navigation
- Touch-friendly buttons
- Optimized layouts

## Browser Support

- Chrome (latest 2 versions)
- Firefox (latest 2 versions)
- Safari (latest 2 versions)
- Edge (latest 2 versions)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance

The theme is optimized for performance with:
- Lazy loading images
- Minified CSS and JS
- Optimized database queries
- Preconnect to external resources
- Efficient animations

## Security

Security features include:
- Nonce verification for forms
- Input sanitization
- XSS protection
- SQL injection prevention

## Support

For support and customization:
- Contact: contact@databblead.com
- Documentation: Available in theme files
- WordPress Codex: https://codex.wordpress.org/

## License

This theme is licensed under GPL v2 or later.

## Changelog

### Version 1.0.0
- Initial release
- Facebook Pixel integration
- Mobile responsive design
- SEO optimization
- Contact form functionality
- Performance optimizations

## Credits

- Built from Lovable project
- Uses Inter font from Google Fonts
- Icons from Lucide React (converted to CSS)
- Gradient patterns inspired by modern web design
- Animation libraries: Custom CSS animations

## Development

For developers working on this theme:

### Build Process
The theme uses vanilla CSS and JavaScript for maximum compatibility.

### Coding Standards
- Follows WordPress Coding Standards
- PSR-4 autoloading for PHP classes
- ESLint configuration for JavaScript
- SCSS preprocessing for styles

### Testing
- Cross-browser testing
- Mobile device testing
- WordPress unit tests
- Performance testing

### Contributing
1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request
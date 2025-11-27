# TapDJ Static Site - Deployment Guide

## Local Testing

To test the site locally, you can use any of these methods:

### Method 1: Python Simple HTTP Server

```bash
# Python 3
cd docs
python3 -m http.server 8000

# Then visit: http://localhost:8000
```

### Method 2: Node.js http-server

```bash
# Install http-server globally (if not already installed)
npm install -g http-server

# Start server
cd docs
http-server -p 8000

# Then visit: http://localhost:8000
```

### Method 3: PHP Built-in Server

```bash
cd docs
php -S localhost:8000

# Then visit: http://localhost:8000
```

## Deployment Options

### GitHub Pages

1. Create a new repository on GitHub
2. Push the contents of the `docs` folder to the repository
3. Go to Settings > Pages
4. Select the branch and folder (usually `main` and `/root` or `/docs`)
5. Your site will be live at `https://yourusername.github.io/repository-name/`

### Netlify

1. Create an account at [Netlify](https://www.netlify.com/)
2. Drag and drop the `docs` folder to Netlify
3. Your site will be live instantly with a custom URL
4. Optional: Connect to a Git repository for automatic deployments

### Vercel

1. Create an account at [Vercel](https://vercel.com/)
2. Install Vercel CLI: `npm install -g vercel`
3. Run `vercel` in the `docs` directory
4. Follow the prompts to deploy

### Traditional Web Hosting

1. Use FTP/SFTP to upload all files from the `docs` folder
2. Upload to your web root directory (often `public_html` or `www`)
3. Ensure proper file permissions (usually 644 for files, 755 for directories)

### AWS S3 + CloudFront

1. Create an S3 bucket
2. Enable static website hosting
3. Upload all files from the `docs` folder
4. Set bucket policy for public read access
5. Optional: Set up CloudFront for CDN and HTTPS

## Custom Domain

For any of the above hosting options, you can configure a custom domain:

1. Update your DNS records to point to the hosting provider
2. Add CNAME record for www subdomain (if applicable)
3. Configure SSL/HTTPS (usually automatic with modern hosting providers)

## Important Notes

- The site uses external CDN links for jQuery, so an internet connection is required
- Video embeds require internet access to load from Vimeo and YouTube
- All assets are self-contained in the `docs` folder
- No server-side processing is required (pure static HTML/CSS/JS)

## File Structure

```
docs/
├── index.html          # Homepage
├── features.html       # Features page
├── robots.txt          # Search engine directives
├── README.md           # Documentation
├── DEPLOY.md           # This file
├── css/
│   ├── style.css       # Main stylesheet
│   └── tapdj.css       # Custom styles
├── js/
│   ├── tapdj.js        # Custom JavaScript
│   ├── AC_Quicktime.js # QuickTime player
│   ├── LLQTPlayer.js   # LL QuickTime player
│   └── fancybox/       # Lightbox library
└── images/             # All site images
    ├── features/       # Feature images
    ├── list-icons/     # Icon images
    ├── screen/         # Screenshot images
    ├── headers/        # Header images
    ├── contest/        # Contest images
    └── tiny/           # Tiny URL images
```

## Support

For issues or questions, please refer to the main README.md file or contact Laan Labs.


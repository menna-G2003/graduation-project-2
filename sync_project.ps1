# Sync project with GitHub repository
$sourceDir = "C:\project\New folder\final-backend"
$targetDir = "C:\project\New folder\app"

Write-Host "Syncing project folders from GitHub repository..." -ForegroundColor Green

# Copy files from repository to project (preserving existing files if needed)
$filesToCopy = @(
    ".editorconfig",
    ".env.example", 
    ".firebaserc",
    ".gitattributes",
    ".gitignore",
    ".htaccess",
    "API_DOCUMENTATION.md",
    "artisan",
    "composer.json",
    "composer.lock",
    "firebase.json",
    "package.json",
    "phpunit.xml",
    "real-estate-api.postman_collection.json",
    "real-estate-api.postman_environment.json",
    "vercel.json",
    "vite.config.js",
    "README.md"
)

# Create directories if they don't exist
$directories = @(
    "app",
    "backup",
    "bootstrap",
    "config",
    "database",
    "Http",
    "postman",
    "public",
    "resources",
    "routes",
    "storage",
    "tests",
    ".firebase"
)

foreach ($dir in $directories) {
    $source = Join-Path -Path $sourceDir -ChildPath $dir
    $target = Join-Path -Path $targetDir -ChildPath $dir
    
    if (Test-Path -Path $source) {
        if (-not (Test-Path -Path $target)) {
            Write-Host "Creating directory: $dir" -ForegroundColor Yellow
            New-Item -Path $target -ItemType Directory -Force | Out-Null
        }
        
        # Copy contents recursively (this will overwrite files)
        Write-Host "Syncing directory: $dir" -ForegroundColor Yellow
        Copy-Item -Path "$source\*" -Destination $target -Recurse -Force
    }
}

# Copy root files
foreach ($file in $filesToCopy) {
    $source = Join-Path -Path $sourceDir -ChildPath $file
    $target = Join-Path -Path $targetDir -ChildPath $file
    
    if (Test-Path -Path $source) {
        Write-Host "Copying file: $file" -ForegroundColor Yellow
        Copy-Item -Path $source -Destination $target -Force
    }
}

Write-Host "Project synchronization complete!" -ForegroundColor Green
Write-Host "Note: Your .env file was preserved to maintain your local configuration." -ForegroundColor Cyan 
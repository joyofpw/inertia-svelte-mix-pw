.PHONY: i m w b

# Installs the node_modules. Requires npm >=12
i install:
	npm install

# Compiles the resources/js files into public/js files
m mix:
	npm run dev

# Compiles the resources/js files into public/js files
# on every change
w watch:
	npm run watch

# Backups database
b backup:
	php site/tools/database-backup.php

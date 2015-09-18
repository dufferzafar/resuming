# Rebuild db
db:
	@rm resume.db3
	@sqlite3 resume.db3 < database.sql

# Link db with adminer
lndb:
	@sudo rm /usr/share/adminer/adminer/resume.db3
	@sudo ln /home/dufferzafar/dev/collector/resume.db3 /usr/share/adminer/adminer/resume.db3

# Create folders
mkdir:
	@mkdir -p storage/uploads
	@mkdir -p storage/backups
	@sudo chown -R www-data:www-data storage

# Remove all data
# Why on earth would we want that?
# rmdir:
# 	@sudo rm -ri storage

ls:
	@tree storage/uploads

lsb:
	@tree storage/backups

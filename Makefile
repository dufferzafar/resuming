db:
	@# Rebuild db
	@rm resume.db3
	@sqlite3 resume.db3 < database.sql

	@# Link db with adminer
	@sudo rm /usr/share/adminer/adminer/resume.db3
	@sudo ln /home/dufferzafar/dev/collector/resume.db3 /usr/share/adminer/adminer/resume.db3

mkdir:
	@mkdir -p storage/uploads
	@mkdir -p storage/backups
	@sudo chown -R www-data:www-data storage

rmdir:
	@sudo rm -ri storage

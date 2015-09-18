db:
	@# Rebuild db
	@rm resume.db3
	@sqlite3 resume.db3 < database.sql

	@# Link db with adminer
	@sudo rm /usr/share/adminer/adminer/resume.db3
	@sudo ln /home/dufferzafar/dev/collector/resume.db3 /usr/share/adminer/adminer/resume.db3

setup:
	@mkdir resumes
	@sudo chown www-data:www-data resumes

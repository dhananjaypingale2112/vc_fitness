#!/usr/bin/python
import os
import sys
import commands
from time import gmtime, strftime
import glob
db_backup_path = "/var/www/backup/db/"
backup_path = "/var/www/backup/"
## database password
password = "FiduMighty"
db_file_name = "all_databases.sql"

## back the data, of last N days from current date
keep_number_of_days = 4




########################
# Remove the older files
########################
def remove_older(backup_path):
    files = filter(os.path.isfile, glob.glob(backup_path + "*.gz"))
    if len(files)>4:
        files.sort(key=lambda x: os.path.getmtime(x))
        for i in range(keep_number_of_days):
            files.pop()
        for file_name in files:    
            os.remove(file_name)
        return 0


if not os.path.isdir(backup_path):
    commands.getstatusoutput("sudo mkdir {0}".format(backup_path))
    
if not os.path.isdir(db_backup_path): 
    commands.getstatusoutput("sudo mkdir {0}".format(db_backup_path))
if len(sys.argv) > 1 : 
    backup_path = sys.argv[1]
    source_files = sys.argv[2]
    
    print "Backup path: {0}".format(backup_path)
    print "source_files path: {0}".format(source_files)
    
    #backup_file_name = "backup_"+strftime("%Y-%m-%d_%H-%M-%S", gmtime()) + ".gz"
    backup_file_name = "backup_"+strftime("%Y-%m-%d_%H-%M-%S") + ".zip"
    backup_destiation_path = os.path.join(backup_path, backup_file_name)

    os.chdir(source_files)
    os.getcwd()
    output = commands.getstatusoutput("sudo zip -r {0} .".format(backup_file_name))
    
    commands.getstatusoutput("sudo mv {0} {1}".format(backup_file_name, backup_path))
    
    if output[0] == 0:
        print("backup done from source_files {0}, to {1}".format(source_files, backup_destiation_path))
    else:
        print "Error ouccred during copyting the file "
        
    db_backup_file_name = "db_backup_"+strftime("%Y-%m-%d_%H-%M-%S", gmtime()) + ".gz"
    db_backup_destiation_path = os.path.join(backup_path, db_backup_file_name)
    commands.getstatusoutput("mysqldump -u root -p [{0}] --all-databases > {1}".format(password, db_file_name))
    os.chdir(source_files)
    commands.getstatusoutput("sudo zip -r {0} all_databases.sql".format(db_backup_file_name))
    commands.getstatusoutput("sudo mv {0} {1} ".format(db_backup_file_name, db_backup_path))
    commands.getstatusoutput("sudo rm {0}".format(db_file_name))
    print("database backup done at {0}".format(db_backup_destiation_path))

    remove_older(backup_path)
    remove_older(db_backup_path)


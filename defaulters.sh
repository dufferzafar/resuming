#!/bin/bash

# defaulters.sh
#
# Find students who are in the database but
# have not yet submitted their resume.
#
# TODO: Do this in PHP; Read from DB; Display on site;

set -euo pipefail
IFS=$'\n\t'

# Read the SQL file to find out names of students
names=$(sed -n 10,80p database.sql | cut -d ',' -f2 | tr -d "\"")

# Iterate!
for name in $names
do
    # Remove leading & trailing spaces from file names
    name_trimmed="$(echo -e "${name}" | sed -e 's/^[[:space:]]*//' -e 's/[[:space:]]*$//')"
    resume=$name_trimmed.pdf

    if [[ ! -f ./_Help/resume/$resume ]]; then
        # List students who have not yet submitted a resume
        echo $resume
    fi
done

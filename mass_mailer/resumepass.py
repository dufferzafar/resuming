import quickstart

# This data was redacted!
data = [("Roll Number", "FirstName LastName", "email@provider.com", "random_password")]

for data_single in data:
    email_value = "{0}, Your account for http://www.jdev.in/resuming has been created. Login using email {1} and password {2} in order to upload/view/reupload your resume.".format(data_single[1],data_single[2], data_single[3])
    quickstart.sendAssignment(email_value, data_single[2])

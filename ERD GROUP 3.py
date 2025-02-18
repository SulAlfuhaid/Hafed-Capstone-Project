from graphviz import Digraph
#GROUP 3 WORK

# إنشاء كائن الرسم البياني
dot = Digraph(comment='ER Diagram')

# إضافة العقد (الجداول) مع تحديد shape="plaintext"
dot.node('User', '''<
<table border="0" cellborder="1" cellspacing="0">
    <tr><td colspan="2"><b>User</b></td></tr>
    <tr><td>UserID</td><td>PK</td></tr>
    <tr><td>Name</td><td></td></tr>
    <tr><td>Email</td><td></td></tr>
    <tr><td>Password</td><td></td></tr>
    <tr><td>Role</td><td></td></tr>
    <tr><td>CreatedAt</td><td></td></tr>
</table>>''', shape="plaintext")

dot.node('Teacher', '''<
<table border="0" cellborder="1" cellspacing="0">
    <tr><td colspan="2"><b>Teacher</b></td></tr>
    <tr><td>TeacherID</td><td>PK, FK</td></tr>
    <tr><td>SubscriptionStatus</td><td></td></tr>
</table>>''', shape="plaintext")

dot.node('Student', '''<
<table border="0" cellborder="1" cellspacing="0">
    <tr><td colspan="2"><b>Student</b></td></tr>
    <tr><td>StudentID</td><td>PK, FK</td></tr>
    <tr><td>MemorizationLevel</td><td></td></tr>
    <tr><td>Points</td><td></td></tr>
    <tr><td>FamilyID</td><td>FK</td></tr>
</table>>''', shape="plaintext")

dot.node('Family', '''<
<table border="0" cellborder="1" cellspacing="0">
    <tr><td colspan="2"><b>Family</b></td></tr>
    <tr><td>FamilyID</td><td>PK, FK</td></tr>
    <tr><td>PhoneNumber</td><td></td></tr>
    <tr><td>RelationType</td><td></td></tr>
    <tr><td>NotificationPreference</td><td></td></tr>
</table>>''', shape="plaintext")

dot.node('StudyCircle', '''<
<table border="0" cellborder="1" cellspacing="0">
    <tr><td colspan="2"><b>StudyCircle</b></td></tr>
    <tr><td>StudyCircleID</td><td>PK</td></tr>
    <tr><td>Name</td><td></td></tr>
    <tr><td>TeacherID</td><td>FK</td></tr>
    <tr><td>Capacity</td><td></td></tr>
    <tr><td>Schedule</td><td></td></tr>
    <tr><td>Description</td><td></td></tr>
</table>>''', shape="plaintext")

dot.node('Attendance', '''<
<table border="0" cellborder="1" cellspacing="0">
    <tr><td colspan="2"><b>Attendance</b></td></tr>
    <tr><td>AttendanceID</td><td>PK</td></tr>
    <tr><td>StudentID</td><td>FK</td></tr>
    <tr><td>StudyCircleID</td><td>FK</td></tr>
    <tr><td>DateTime</td><td></td></tr>
    <tr><td>Status</td><td></td></tr>
    <tr><td>Notes</td><td></td></tr>
</table>>''', shape="plaintext")

dot.node('Evaluation', '''<
<table border="0" cellborder="1" cellspacing="0">
    <tr><td colspan="2"><b>Evaluation</b></td></tr>
    <tr><td>EvaluationID</td><td>PK</td></tr>
    <tr><td>StudentID</td><td>FK</td></tr>
    <tr><td>TeacherID</td><td>FK</td></tr>
    <tr><td>SurahName</td><td></td></tr>
    <tr><td>FromVerse</td><td></td></tr>
    <tr><td>ToVerse</td><td></td></tr>
    <tr><td>Score</td><td></td></tr>
    <tr><td>Comments</td><td></td></tr>
    <tr><td>EvaluationDate</td><td></td></tr>
    <tr><td>EvaluationType</td><td></td></tr>
    <tr><td>Notes</td><td></td></tr>
</table>>''', shape="plaintext")

dot.node('Notification', '''<
<table border="0" cellborder="1" cellspacing="0">
    <tr><td colspan="2"><b>Notification</b></td></tr>
    <tr><td>NotificationID</td><td>PK</td></tr>
    <tr><td>FamilyID</td><td>FK</td></tr>
    <tr><td>StudentID</td><td>FK</td></tr>
    <tr><td>Type</td><td></td></tr>
    <tr><td>Message</td><td></td></tr>
    <tr><td>IsRead</td><td></td></tr>
    <tr><td>CreatedAt</td><td></td></tr>
</table>>''', shape="plaintext")

dot.node('Subscription', '''<
<table border="0" cellborder="1" cellspacing="0">
    <tr><td colspan="2"><b>Subscription</b></td></tr>
    <tr><td>SubscriptionID</td><td>PK</td></tr>
    <tr><td>TeacherID</td><td>FK</td></tr>
    <tr><td>Type</td><td></td></tr>
    <tr><td>Status</td><td></td></tr>
    <tr><td>Amount</td><td></td></tr>
    <tr><td>StartDate</td><td></td></tr>
    <tr><td>EndDate</td><td></td></tr>
    <tr><td>LastRenewal</td><td></td></tr>
</table>>''', shape="plaintext")

dot.node('Leaderboard', '''<
<table border="0" cellborder="1" cellspacing="0">
    <tr><td colspan="2"><b>Leaderboard</b></td></tr>
    <tr><td>LeaderboardID</td><td>PK</td></tr>
    <tr><td>StudentID</td><td>FK</td></tr>
    <tr><td>Points</td><td></td></tr>
    <tr><td>Ranking</td><td></td></tr>
    <tr><td>BoardType</td><td></td></tr>
    <tr><td>PeriodStart</td><td></td></tr>
    <tr><td>PeriodEnd</td><td></td></tr>
</table>>''', shape="plaintext")

dot.node('Report', '''<
<table border="0" cellborder="1" cellspacing="0">
    <tr><td colspan="2"><b>Report</b></td></tr>
    <tr><td>ReportID</td><td>PK</td></tr>
    <tr><td>SenderID</td><td>FK</td></tr>
    <tr><td>ReportType</td><td></td></tr>
    <tr><td>Content</td><td></td></tr>
    <tr><td>CreatedAt</td><td></td></tr>
    <tr><td>IsRead</td><td></td></tr>
    <tr><td>RecipientID</td><td>FK</td></tr>
</table>>''', shape="plaintext")

dot.node('Payment', '''<
<table border="0" cellborder="1" cellspacing="0">
    <tr><td colspan="2"><b>Payment</b></td></tr>
    <tr><td>PaymentID</td><td>PK</td></tr>
    <tr><td>SubscriptionID</td><td>FK</td></tr>
    <tr><td>Amount</td><td></td></tr>
    <tr><td>PaymentMethod</td><td></td></tr>
    <tr><td>PaymentDate</td><td></td></tr>
    <tr><td>PaymentStatus</td><td></td></tr>
</table>>''', shape="plaintext")

dot.edge('User', 'Teacher', label='1..1 register as', dir='none')
dot.edge('User', 'Student', label='1..1 register as', dir='none')
dot.edge('User', 'Family', label='1..1 register as', dir='none') 

dot.edge('Family', 'Notification', label='1..* receives', dir='forward')  
dot.edge('Student', 'Notification', label='1..* receives', dir='forward')  

dot.edge('Teacher', 'StudyCircle', label='1..* conducts', dir='forward')  
dot.edge('Teacher', 'Subscription', label='1..* has', dir='forward')  

dot.edge('Student', 'StudyCircle', label='*..* joins', dir='both')  

dot.edge('Student', 'Attendance', label='1..* records', dir='forward')  
dot.edge('StudyCircle', 'Attendance', label='1..* records', dir='forward')  

dot.edge('Student', 'Evaluation', label='1..* receives', dir='forward')  
dot.edge('Teacher', 'Evaluation', label='1..* gives', dir='forward')  

dot.edge('Student', 'Leaderboard', label='1..* appears in', dir='forward')  

dot.edge('Teacher', 'Report', label='1..* creates', dir='forward')  
dot.edge('Family', 'Report', label='1..* views', dir='forward')  

dot.edge('Subscription', 'Payment', label='1..* is paid through', dir='forward')  


# حفظ الرسم البياني كملف
dot.render('er_diagram_with_relationships', format='png', cleanup=True)

# عرض الرسم البياني
dot.view()
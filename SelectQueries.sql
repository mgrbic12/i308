#1a (backup query)
SELECT DISTINCT CONCAT(s.lname, ', ', s.fname) AS full_name
FROM Students AS s, Students_Grades AS sg
WHERE sg.studentid = s.studentid
AND sg.sectionid = $var_sectionid;

#1b  
SELECT DISTINCT CONCAT(s.lname, ', ', s.fname) AS full_name, TRUNCATE(SUM(sg.GPA  * c.credit_hours)/SUM(c.credit_hours),2) AS Class_GPA
FROM Students AS s, Students_Grades AS sg, Courses AS c, Sections AS sc
WHERE sg.studentid = s.studentid
AND sc.sectionid = sg.sectionid
AND c.course_num = sc.course_num
AND sg.sectionid = $var_sectionid
GROUP BY s.studentid;



#3b
SELECT CONCAT(f.lname, ', ', f.fname) AS full_name
FROM Faculty AS f
WHERE f.facultyid NOT IN (
  SELECT DISTINCT sc.facultyid
  FROM Sections AS sc, Courses AS c
  WHERE sc.course_num = c.course_num
  AND c.course_num = $var_course_num);



#5c
SELECT CONCAT(s.lname, ', ', s.fname) AS full_name, c.title AS c_title, sg.letter_grade AS let_grade, c.credit_hours AS c_hours, sg.GPA AS gpa
FROM Courses AS c, Students AS s, Students_Grades AS sg, Sections AS sc
WHERE sc.course_num = c.course_num
AND s.studentid = sg.studentid
AND sc.sectionid = sg.sectionid
AND sc.course_num = c.course_num
AND s.studentid = $var_studentid
UNION SELECT '' AS empty, '' AS empty2, 'TOTAL' AS total, SUM(c.credit_hours) AS total_credits, TRUNCATE(SUM(sg.GPA * c.credit_hours)/SUM(c.credit_hours),2) AS GPA
FROM Courses AS c, Students_Grades AS sg, Sections AS sc, Students AS s
WHERE sc.course_num = c.course_num
AND sc.sectionid = sg.sectionid
AND s.studentid = $var_studentid
AND sg.studentid = $var_studentid
AND sg.letter_grade <> 'F'
GROUP BY s.studentid;




#9c
SELECT m.majorid AS MajorID, CONCAT(s.fname, ' ', s.lname) AS fullname, SUM(c.credit_hours) AS credits_earned, m.gradreq AS Req, TRUNCATE(SUM(sg.GPA * c.credit_hours)/SUM(c.credit_hours),2) AS overallGPA
FROM Majors AS m, Students AS s, Courses AS c, Students_Grades AS sg, Sections AS sc, Students_Majors AS sm
WHERE s.studentid = sg.studentid
AND sm.studentid = s.studentid
AND sg.studentid = sm.studentid
AND sg.sectionid = sc.sectionid
AND sc.course_num = c.course_num
AND sm.majorid = m.majorid
GROUP BY fullname
HAVING credits_earned >= Req
ORDER BY MajorID ASC, fullname ASC;



#additional query 1
Select what advisor you want then return the Students who share that advisor

SELECT a.advisorid AS AdvisorID, CONCAT(s.fname, ' ', s.lname) AS fullname
FROM Advisors AS a, Students AS s
WHERE a.advisorid = s.advisorid
AND a.advisorid = 2;



#additional query 2
returns types of contact information for the students

SELECT DISTINCT sp.studentid, sp.phone, sp.type
FROM Students_Phone AS sp;



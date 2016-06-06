
INSERT INTO `quiz` ( 
`lec_video_id`, 
`course_id`, 
`quiz_name`, 
`quiz_num_quest`, 
`quiz_time_stat`, 
`quiz_time_limit`, 
`quiz_total_score`, 
`quiz_pass_percent`, 
`quiz_stat`, 
`quiz_createdby_id`, 
`quiz_recstat_id`) 
(

SELECT `video_lectures`.lec_video_id,  
video_lectures.course, 
CONCAT("Quiz of ", video_lectures.lec_title),
5,
"Y",
1,
15,
"50",
1,
"10303511",
1

FROM video_lectures

)	

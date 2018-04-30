package com.tomorrow.orm.entity;

import javax.persistence.*;

/**
 * @author zhangxishuo on 2018/4/30
 * 课程实体
 */

@Entity
public class Course {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;                          // 课程id

    private String name;                      // 课程名称

    private String courseCredit;              // 课程学分

    private String experimentCredit;          // 实验学分

    private String assessment;                // 考核方式

    @ManyToOne
    private Term term;                        // 上课学期

    @ManyToOne
    private Teacher teacher;                  // 授课教师
}

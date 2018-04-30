package com.tomorrow.orm.entity;

import javax.persistence.*;

/**
 * @author zhangxishuo on 2018/4/30
 * 学生实体
 */

@Entity
public class Student {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;                          // 学生id

    private String name;                      // 学生姓名

    @ManyToOne
    private Specialty specialty;              // 专业
}

package com.tomorrow.orm.entity;

import javax.persistence.*;

/**
 * @author zhangxishuo on 2018/4/30
 * 教师实体
 */

@Entity
public class Teacher {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;                          // 教师id

    private String name;                      // 教师姓名

    @OneToOne
    private User user;                        // 登录账户
}

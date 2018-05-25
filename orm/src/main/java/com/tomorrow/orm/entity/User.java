package com.tomorrow.orm.entity;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

/**
 * @author zhangxishuo on 2018/5/1
 * 用户实体
 */

@Entity
public class User {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;                          // 用户id

    private String username;                  // 用户名

    private String password;                  // 密码

    /* 权限 1:管理员 0:教师 -1:学生 */
    private Integer power;                    // 权限
}

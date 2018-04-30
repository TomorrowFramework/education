package com.tomorrow.orm.entity;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

/**
 * @author zhangxishuo on 2018/4/30
 * 专业实体
 */

@Entity
public class Specialty {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;                           // 专业id

    private String name;                       // 专业名称
}

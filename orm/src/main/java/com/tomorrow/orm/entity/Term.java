package com.tomorrow.orm.entity;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import java.util.Calendar;

/**
 * @author zhangxishuo on 2018/4/30
 * 学期实体
 */

@Entity
public class Term {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;                         // 学期id

    private String name;                     // 学期名称

    private Calendar startTime;              // 起始时间

    private Calendar endTime;                // 结束时间

    private Boolean isCurrent;               // 是否为当前学期
}

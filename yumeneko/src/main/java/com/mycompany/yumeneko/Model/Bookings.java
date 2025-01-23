/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.yumeneko.Model;

import java.io.Serializable;
import java.util.Date;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Persistence;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;

/**
 *
 * @author patak
 */
@Entity
@Table(name = "bookings")
@NamedQueries({
    @NamedQuery(name = "Bookings.findAll", query = "SELECT b FROM Bookings b"),
    @NamedQuery(name = "Bookings.findById", query = "SELECT b FROM Bookings b WHERE b.booking_id = :booking_id"),
    @NamedQuery(name = "Bookings.findByCustomer", query = "SELECT b FROM Bookings b WHERE b.customer_id = :customer_id"),
    @NamedQuery(name = "Bookings.findByTable", query = "SELECT b FROM Bookings b WHERE e.table_id = :table_id"),
    @NamedQuery(name = "Bookings.findByDate", query = "SELECT b FROM Bookings b WHERE e.booking_date = :booking_date"),
    @NamedQuery(name = "Bookings.findByStatus", query = "SELECT b FROM Bookings b WHERE b.status = :status")})
public class Bookings implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "booking_id")
    private Integer id;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 100)
    @Column(name = "customer_id")
    private int customer;
    @Basic(optional = false)
    @NotNull
    @Column(name = "table_id")
    private int table;
    @Basic(optional = false)
    @NotNull
    @Column(name = "booking_date")
    @Temporal(TemporalType.TIMESTAMP)
    private Date date;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 255)
    @Column(name = "status")
    private String status;

    static EntityManagerFactory emf = Persistence.createEntityManagerFactory("com.mycompany_yumeneko_war_1.0-SNAPSHOTPU");

    public Bookings() {
    }

    public Bookings(Integer id) {
        EntityManager em = emf.createEntityManager();

        try {
            Bookings b = em.find(Bookings.class, id);

            this.id = b.getId();
            this.customer = b.getCustomer();
            this.table = b.getTable();
            this.date = b.getDate();
            this.status = b.getStatus();
        } catch (Exception ex) {
            System.err.println("Hiba: " + ex.getLocalizedMessage());
        } finally {
            em.clear();
            em.close();
        }
    }

    public Bookings(Integer id, int customer, int table, Date date, String status) {
        this.id = id;
        this.customer = customer;
        this.table = table;
        this.date = date;
        this.status = status;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public int getCustomer() {
        return customer;
    }

    public void setCustomer(int customer) {
        this.customer = customer;
    }

    public int getTable() {
        return table;
    }

    public void setTable(int table) {
        this.table = table;
    }

    public Date getDate() {
        return date;
    }

    public void setDate(Date date) {
        this.date = date;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (id != null ? id.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Bookings)) {
            return false;
        }
        Bookings other = (Bookings) object;
        if ((this.id == null && other.id != null) || (this.id != null && !this.id.equals(other.id))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "com.mycompany.yumeneko.Model.Bookings[ id=" + id + " ]";
    }

}

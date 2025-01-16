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
    @NamedQuery(name = "Event.findAll", query = "SELECT e FROM Bookings e"),
    @NamedQuery(name = "Event.findById", query = "SELECT e FROM Bookings e WHERE e.id = :id"),
    @NamedQuery(name = "Event.findByName", query = "SELECT e FROM Bookings e WHERE e.name = :name"),
    @NamedQuery(name = "Event.findByPlaceId", query = "SELECT e FROM Bookings e WHERE e.placeId = :placeId"),
    @NamedQuery(name = "Event.findByStartTime", query = "SELECT e FROM Bookings e WHERE e.startTime = :startTime"),
    @NamedQuery(name = "Event.findByEndTime", query = "SELECT e FROM Bookings e WHERE e.endTime = :endTime"),
    @NamedQuery(name = "Event.findByPicture", query = "SELECT e FROM Bookings e WHERE e.picture = :picture"),
    @NamedQuery(name = "Event.findByIsDeleted", query = "SELECT e FROM Bookings e WHERE e.isDeleted = :isDeleted"),
    @NamedQuery(name = "Event.findByCreatedAt", query = "SELECT e FROM Bookings e WHERE e.createdAt = :createdAt"),
    @NamedQuery(name = "Event.findByDeletedAt", query = "SELECT e FROM Bookings e WHERE e.deletedAt = :deletedAt")})
public class Bookings implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id")
    private Integer id;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 100)
    @Column(name = "name")
    private String name;
    @Basic(optional = false)
    @NotNull
    @Column(name = "place_id")
    private int placeId;
    @Basic(optional = false)
    @NotNull
    @Column(name = "start_time")
    @Temporal(TemporalType.TIMESTAMP)
    private Date startTime;
    @Basic(optional = false)
    @NotNull
    @Column(name = "end_time")
    @Temporal(TemporalType.TIMESTAMP)
    private Date endTime;
    @Basic(optional = false)
    @NotNull
    @Size(min = 1, max = 255)
    @Column(name = "picture")
    private String picture;
    @Basic(optional = false)
    @NotNull
    @Column(name = "is_deleted")
    private boolean isDeleted;
    @Basic(optional = false)
    @NotNull
    @Column(name = "created_at")
    @Temporal(TemporalType.TIMESTAMP)
    private Date createdAt;
    @Column(name = "deleted_at")
    @Temporal(TemporalType.TIMESTAMP)
    private Date deletedAt;

    static EntityManagerFactory emf = Persistence.createEntityManagerFactory("com.mycompany_yumeneko_war_1.0-SNAPSHOTPU");

    public Bookings() {
    }

    public Bookings(Integer id) {
        EntityManager em = emf.createEntityManager();

        try {
            Bookings e = em.find(Bookings.class, id);

            this.id = e.getId();
            this.name = e.getName();
            this.placeId = e.getPlaceId();
            this.startTime = e.getStartTime();
            this.endTime = e.getEndTime();
            this.picture = e.getPicture();
            this.isDeleted = e.getIsDeleted();
            this.createdAt = e.getCreatedAt();
            this.createdAt = e.getCreatedAt();
        } catch (Exception ex) {
            System.err.println("Hiba: " + ex.getLocalizedMessage());
        } finally {
            em.clear();
            em.close();
        }
    }

    public Bookings(Integer id, String name, int placeId, Date startTime, Date endTime, String picture, boolean isDeleted, Date createdAt) {
        this.id = id;
        this.name = name;
        this.placeId = placeId;
        this.startTime = startTime;
        this.endTime = endTime;
        this.picture = picture;
        this.isDeleted = isDeleted;
        this.createdAt = createdAt;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public int getPlaceId() {
        return placeId;
    }

    public void setPlaceId(int placeId) {
        this.placeId = placeId;
    }

    public Date getStartTime() {
        return startTime;
    }

    public void setStartTime(Date startTime) {
        this.startTime = startTime;
    }

    public Date getEndTime() {
        return endTime;
    }

    public void setEndTime(Date endTime) {
        this.endTime = endTime;
    }

    public String getPicture() {
        return picture;
    }

    public void setPicture(String picture) {
        this.picture = picture;
    }

    public boolean getIsDeleted() {
        return isDeleted;
    }

    public void setIsDeleted(boolean isDeleted) {
        this.isDeleted = isDeleted;
    }

    public Date getCreatedAt() {
        return createdAt;
    }

    public void setCreatedAt(Date createdAt) {
        this.createdAt = createdAt;
    }

    public Date getDeletedAt() {
        return deletedAt;
    }

    public void setDeletedAt(Date deletedAt) {
        this.deletedAt = deletedAt;
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
        return "com.iakk.backendvizsga.model.Event[ id=" + id + " ]";
    }

}

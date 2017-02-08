package com.crawler.model;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;
import java.util.List;


/**
 * The persistent class for the waits database table.
 * 
 */
@Entity
@Table(name="waits")
@NamedQuery(name="Wait.findAll", query="SELECT w FROM Wait w")
public class Wait implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private Integer id;

	@Column(name="central_latitude")
	private double centralLatitude;

	@Column(name="central_longitude")
	private double centralLongitude;

	@Temporal(TemporalType.TIMESTAMP)
	private Date created;

	@Temporal(TemporalType.TIMESTAMP)
	private Date deleted;

	private int distance;

	private String end;

	@Column(name="max_price")
	private int maxPrice;

	@Temporal(TemporalType.TIMESTAMP)
	private Date modified;

	private int must;

	private int status;

	@Temporal(TemporalType.TIMESTAMP)
	private Date start;

	private int succession;

	//bi-directional many-to-one association to Queue
	@OneToMany(mappedBy="wait", cascade=CascadeType.ALL)
	private List<Queue> queues;

	//bi-directional many-to-one association to User
	@ManyToOne
	private User user;

	//bi-directional many-to-one association to Notify
	@ManyToOne
	private Notify notify;

	//bi-directional many-to-one association to Facility
	@ManyToOne
	private Facility facility;

	public Wait() {
	}

	public Integer getId() {
		return this.id;
	}

	public void setId(Integer id) {
		this.id = id;
	}

	public double getCentralLatitude() {
		return this.centralLatitude;
	}

	public void setCentralLatitude(double centralLatitude) {
		this.centralLatitude = centralLatitude;
	}

	public double getCentralLongitude() {
		return this.centralLongitude;
	}

	public void setCentralLongitude(double centralLongitude) {
		this.centralLongitude = centralLongitude;
	}

	public Date getCreated() {
		return this.created;
	}

	public void setCreated(Date created) {
		this.created = created;
	}

	public Date getDeleted() {
		return this.deleted;
	}

	public void setDeleted(Date deleted) {
		this.deleted = deleted;
	}

	public int getDistance() {
		return this.distance;
	}

	public void setDistance(int distance) {
		this.distance = distance;
	}

	public String getEnd() {
		return this.end;
	}

	public void setEnd(String end) {
		this.end = end;
	}

	public int getMaxPrice() {
		return this.maxPrice;
	}

	public void setMaxPrice(int maxPrice) {
		this.maxPrice = maxPrice;
	}

	public Date getModified() {
		return this.modified;
	}

	public void setModified(Date modified) {
		this.modified = modified;
	}

	public int getMust() {
		return this.must;
	}

	public void setMust(int must) {
		this.must = must;
	}

	public int getStatus() {
		return status;
	}

	public void setStatus(int status) {
		this.status = status;
	}

	public Date getStart() {
		return this.start;
	}

	public void setStart(Date start) {
		this.start = start;
	}

	public int getSuccession() {
		return this.succession;
	}

	public void setSuccession(int succession) {
		this.succession = succession;
	}

	public List<Queue> getQueues() {
		return this.queues;
	}

	public void setQueues(List<Queue> queues) {
		this.queues = queues;
	}

	public Queue addQueue(Queue queue) {
		getQueues().add(queue);
		queue.setWait(this);

		return queue;
	}

	public Queue removeQueue(Queue queue) {
		getQueues().remove(queue);
		queue.setWait(null);
		return queue;
	}

	public User getUser() {
		return this.user;
	}

	public void setUser(User user) {
		this.user = user;
	}

	public Notify getNotify() {
		return this.notify;
	}

	public void setNotify(Notify notify) {
		this.notify = notify;
	}

	public Facility getFacility() {
		return this.facility;
	}

	public void setFacility(Facility facility) {
		this.facility = facility;
	}

	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		result = prime * result + ((id == null) ? 0 : id.hashCode());
		return result;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Wait other = (Wait) obj;
		if (id == null) {
			if (other.id != null)
				return false;
		} else if (!id.equals(other.id))
			return false;
		return true;
	}

}
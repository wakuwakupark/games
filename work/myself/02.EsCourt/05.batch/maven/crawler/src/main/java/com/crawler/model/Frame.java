package com.crawler.model;

import java.io.Serializable;
import javax.persistence.*;
import java.util.Date;
import java.util.List;


/**
 * The persistent class for the frames database table.
 * 
 */
@Entity
@Table(name="frames")
@NamedQueries({
	@NamedQuery(name="Frame.findAll", query="SELECT f FROM Frame f"),
	@NamedQuery(name="Frame.findByStart", query="SELECT f FROM Frame f WHERE f.court = :court AND f.start = :start")
})
public class Frame implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private Integer id;

	@Temporal(TemporalType.TIMESTAMP)
	private Date created;

	@Temporal(TemporalType.TIMESTAMP)
	private Date deleted;

	@Temporal(TemporalType.TIMESTAMP)
	private Date end;

	@Temporal(TemporalType.TIMESTAMP)
	private Date modified;

	private int price;

	private int reserved;

	private int size;

	@Temporal(TemporalType.TIMESTAMP)
	private Date start;

	//bi-directional many-to-one association to Court
	@ManyToOne
	private Court court;

	//bi-directional many-to-one association to Queue
	@OneToMany(mappedBy="frame", cascade=CascadeType.ALL)
	private List<Queue> queues;

	//bi-directional many-to-one association to Reserve
	@OneToMany(mappedBy="frame", cascade=CascadeType.ALL)
	private List<Reserve> reserves;

	//bi-directional many-to-one association to Reserve
	@OneToMany(mappedBy="frame", cascade=CascadeType.ALL)
	private List<History> histories;

		
	public Frame() {
	}

	public Integer getId() {
		return this.id;
	}

	public void setId(Integer id) {
		this.id = id;
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

	public Date getEnd() {
		return this.end;
	}

	public void setEnd(Date end) {
		this.end = end;
	}

	public Date getModified() {
		return this.modified;
	}

	public void setModified(Date modified) {
		this.modified = modified;
	}

	public int getPrice() {
		return this.price;
	}

	public void setPrice(int price) {
		this.price = price;
	}

	public int getReserved() {
		return this.reserved;
	}

	public void setReserved(int reserved) {
		this.reserved = reserved;
	}

	public int getSize() {
		return this.size;
	}

	public void setSize(int size) {
		this.size = size;
	}

	public Date getStart() {
		return this.start;
	}

	public void setStart(Date start) {
		this.start = start;
	}

	public Court getCourt() {
		return this.court;
	}

	public void setCourt(Court court) {
		this.court = court;
	}

	public List<Queue> getQueues() {
		return this.queues;
	}

	public void setQueues(List<Queue> queues) {
		this.queues = queues;
	}

	public Queue addQueue(Queue queue) {
		getQueues().add(queue);
		queue.setFrame(this);

		return queue;
	}

	public Queue removeQueue(Queue queue) {
		getQueues().remove(queue);
		queue.setFrame(null);

		return queue;
	}

	public List<Reserve> getReserves() {
		return this.reserves;
	}

	public void setReserves(List<Reserve> reserves) {
		this.reserves = reserves;
	}

	public Reserve addReserve(Reserve reserve) {
		getReserves().add(reserve);
		reserve.setFrame(this);

		return reserve;
	}

	public Reserve removeReserve(Reserve reserve) {
		getReserves().remove(reserve);
		reserve.setFrame(null);

		return reserve;
	}
	
	public List<History> getHistories() {
		return this.histories;
	}

	public void setHistories(List<History> histories) {
		this.histories = histories;
	}

	public History addHistory(History history) {
		getHistories().add(history);
		history.setFrame(this);

		return history;
	}

	public History removeHistory(History history) {
		getHistories().remove(history);
		history.setFrame(null);

		return history;
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
		Frame other = (Frame) obj;
		if (id == null) {
			if (other.id != null)
				return false;
		} else if (!id.equals(other.id))
			return false;
		return true;
	}

}